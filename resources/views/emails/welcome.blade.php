@component('mail::message')
# Welcome To hulul


Your demo account has been created successfully and account login :{{ $data['login'] }}.


@component('mail::button', ['url' => 'https://hulul-web-alaa-sufi.vercel.app/react/auth/login-user?fbclid=IwAR3G-j4-izISPc3prQN-3zQXgCcBDx-XGzR0KYF9-Aj88PdAbPo6UL1umc4'])
check it
@endcomponent

Thanks,<br>
Hulul
@endcomponent