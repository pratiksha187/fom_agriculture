<div class="terms-document">
    @foreach($termsDocument['blocks'] as $block)
        @if($block['type'] === 'heading')<h3>{{ $block['text'] }}</h3>
        @else<p>{{ $block['text'] }}</p>@endif
    @endforeach
</div>
