import { Link, Head } from '@inertiajs/react';
export default function LoginNavbar(props) {
    return (
   
        <div className='mynavbar'>
            <a href={route('welcome')}>Home</a>
            <a href={route('makepayment')}>Make payment</a>
            <a href={route('balance')}>Check Balance</a>
            <a href={route('stat')}>Request statement</a> 
            <Link href={route('logout')} method="post">Logout</Link>
         </div>
    )
}