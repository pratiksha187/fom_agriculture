const {spawn} = require('node:child_process');
const fs = require('node:fs');
const pause = ms => new Promise(resolve => setTimeout(resolve, ms));
(async () => {
    const chrome = spawn('C:/Program Files/Google/Chrome/Application/chrome.exe', ['--headless', '--disable-gpu', '--no-sandbox', '--remote-debugging-port=9337', '--user-data-dir=C:/xampp/htdocs/fom_agriculture/tmp/commission-chrome-cdp', 'about:blank'], {windowsHide: true, stdio: 'ignore'});
    let ws;
    try {
        let targets;
        for (let n = 0; n < 50; n++) {
            try { targets = await (await fetch('http://127.0.0.1:9337/json')).json(); break; } catch { await pause(100); }
        }
        ws = new WebSocket(targets.find(t => t.type === 'page').webSocketDebuggerUrl);
        await new Promise(resolve => ws.addEventListener('open', resolve, {once:true}));
        let serial = 0;
        const pending = new Map();
        ws.addEventListener('message', event => {
            const msg = JSON.parse(event.data);
            if (pending.has(msg.id)) { const {resolve,reject} = pending.get(msg.id); pending.delete(msg.id); msg.error ? reject(msg.error) : resolve(msg.result); }
        });
        const send = (method, params = {}) => new Promise((resolve,reject) => {const id = ++serial; pending.set(id, {resolve,reject}); ws.send(JSON.stringify({id, method, params}));});
        const evaluate = async expression => (await send('Runtime.evaluate', {expression, returnByValue:true})).result.value;
        await send('Page.enable');
        await send('Page.navigate', {url:'file:///C:/xampp/htdocs/fom_agriculture/tmp/commission-preview.html'});
        for (let n = 0; n < 50; n++) { if (await evaluate("document.readyState === 'complete' && !!document.querySelector('.commission-record')")) break; await pause(100); }
        for (const width of [1440,390,320]) {
            await send('Emulation.setDeviceMetricsOverride', {width, height:1000, deviceScaleFactor:1, mobile:false});
            await pause(150);
            const check = await evaluate("({width:innerWidth,overflow:document.documentElement.scrollWidth>innerWidth,cssLoaded:getComputedStyle(document.querySelector('.commission-overview')).display==='grid',brokenImages:[...document.images].filter(i=>!i.naturalWidth).length})");
            console.log(JSON.stringify(check));
            const {cssContentSize} = await send('Page.getLayoutMetrics');
            const {data} = await send('Page.captureScreenshot',{format:'png',captureBeyondViewport:true,clip:{x:0,y:0,width,height:Math.ceil(cssContentSize.height),scale:1}});
            fs.writeFileSync(`C:/xampp/htdocs/fom_agriculture/tmp/commission-${width}.png`, Buffer.from(data,'base64'));
            if(check.overflow || !check.cssLoaded || check.brokenImages) throw new Error('Layout check failed');
        }
        console.log('Payment details:', await evaluate("(()=>{const details=[...document.querySelectorAll('.commission-details')][2];details.open=true;return details.open && details.textContent.includes('BANK-REF-1001')})()"));
        await send('Browser.close');
    } finally { ws?.close(); chrome.kill(); }
})().catch(error => {console.error(error);process.exitCode=1;});
