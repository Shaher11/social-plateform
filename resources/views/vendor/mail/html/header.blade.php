<tr>
<td class="header">
<a href="{{route('home')}}" style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
    <img src="{{asset('img/logos/logo-da.png')}}" class="logo" alt="Da-vinci">
{{-- @else
{{ $slot }} --}}
{{-- @endif --}}
</a>
</td>
</tr>
