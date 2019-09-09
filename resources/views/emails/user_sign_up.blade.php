@extends('emails/master_email')

@section('title')
    <title>Welcome to Company</title>
@endsection

@section('preheader')
@endsection

@section('content')
    <table class="main">
        <!-- START MAIN CONTENT AREA -->
        <tr>
            <td class="wrapper">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <p>Hello,</p>
                            <p>Thank you for registration.</p>
                            <p>Kind Regards</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- END MAIN CONTENT AREA -->
    </table>
@endsection

