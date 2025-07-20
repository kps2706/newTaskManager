<p style="font-family: Arial, sans-serif; font-size: 16px;">Hello <strong>{{ $receiver->name }}</strong>,</p>

<p style="font-family: Arial, sans-serif; font-size: 16px;">
    A new comment has been added to your issue:
    <strong style="color: #2c3e50;">#{{ $comment->issue->id }} - {{ $comment->issue->title }}</strong>.
</p>

<table style="font-family: Arial, sans-serif; font-size: 15px; border-collapse: collapse; margin-top: 10px;">
    <tr>
        <td style="padding: 6px 0;"><strong>Commented by:</strong></td>
        <td style="padding: 6px 0;">{{ $comment->user->name }}</td>
    </tr>
    <tr>
        <td style="padding: 6px 0; vertical-align: top;"><strong>Comment:</strong></td>
        <td style="padding: 6px 0;">{{ $comment->comment }}</td>
    </tr>
    <tr>
        <td style="padding: 6px 0;"><strong>Visibility:</strong></td>
        <td style="padding: 6px 0;">{{ ucfirst($comment->visibility ?? 'public') }}</td>
    </tr>
    <tr>
        <td style="padding: 6px 0;"><strong>Date & Time:</strong></td>
        <td style="padding: 6px 0;">{{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y, h:i A') }}</td>
    </tr>
</table>

<p style="font-family: Arial, sans-serif; font-size: 16px; margin-top: 20px;">
    👉 <a href="{{ url('/issues/' . $comment->issue->id) }}" style="color: #007bff; text-decoration: none;">
        Click here to view the issue
    </a>
</p>

<p style="font-family: Arial, sans-serif; font-size: 16px; margin-top: 30px;">
    Regards,<br>
    <strong>{{ config('app.name', 'Support System') }}</strong>
</p>
