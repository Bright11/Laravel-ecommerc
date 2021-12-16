<div class="message">
    @if (session('status'))
    <div class="messagestatus">
        <h1>Admins Power House</h1>
        <h1>{{session('status')}}</h1>
    </div>
    @else
    <h1>Admins Power House</h1>
    @endif
</div>