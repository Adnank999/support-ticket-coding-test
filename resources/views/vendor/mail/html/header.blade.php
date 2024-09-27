@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'SupportTicket')
<img src="https://static.vecteezy.com/system/resources/previews/016/770/557/original/cinema-movie-ticket-on-transparent-background-free-png.png" class="logo" alt="ticke Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
