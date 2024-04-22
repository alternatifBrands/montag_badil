<h1>Welcome To {{env('APP_NAME')}} Application</h1>
<p>Dear: <b>{{ $user->name }}</b> , Your Email: <b>{{ $user->email }}</b></p>
<p>Here is the new verification code , to reset your password <b>{{$otp}}</b></p>
<p>Valid for {{config('montag_constant.VALIDITY')}} minutes</p>
Regards, <b>{{env('APP_NAME')}}</b>