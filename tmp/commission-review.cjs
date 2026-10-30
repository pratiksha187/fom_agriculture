const puppeteer = require('C:/Users/ANIKET PATIL/AppData/Roaming/npm/node_modules/puppeteer');
(async () => {
    const browser = await puppeteer.launch({executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe', headless: true, userDataDir: 'C:/xampp/htdocs/fom_agriculture/tmp/commission-chrome-review'});
    try {
        const page = await browser.newPage();
        await page.goto('file:///C:/xampp/htdocs/fom_agriculture/tmp/commission-preview.html');
        for (const width of [1440, 390, 320]) {
            await page.setViewport({width, height: 1000, deviceScaleFactor: 1});
            await page.screenshot({path: `C:/xampp/htdocs/fom_agriculture/tmp/commission-${width}.png`, fullPage: true});
            const result = await page.evaluate(() => ({overflow: document.documentElement.scrollWidth > innerWidth, cards: document.querySelectorAll('.commission-record').length, cssLoaded: getComputedStyle(document.querySelector('.commission-overview')).display === 'grid', failedImages: [...document.images].filter(i => !i.naturalWidth).length}));
            console.log(JSON.stringify({width, ...result}));
            if (result.overflow || !result.cssLoaded || result.failedImages) throw new Error('Layout check failed');
        }
        await page.setViewport({width: 390, height: 1000});
        await page.locator('.commission-record:nth-of-type(3) summary').click();
        console.log('Payment details open:', await page.evaluate(() => [...document.querySelectorAll('.commission-details')].some(d => d.open && d.textContent.includes('BANK-REF-1001'))));
        await page.screenshot({path: 'C:/xampp/htdocs/fom_agriculture/tmp/commission-mobile-details.png', fullPage: true});
    } finally { await browser.close(); }
})().catch(error => { console.error(error); process.exitCode = 1; });
