@if (session('status') === 'SUCCESS_DELETE')
<p class="green">
    {{session('message')}}
</p>
@endif
