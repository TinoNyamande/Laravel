import { Link, Head } from '@inertiajs/react';
export default function Navbar(props) {
    return (
   
        <div className='mynavbar'>
            <Link>Open Account</Link>  
            <Link>Contact us</Link>
            <Link>Branch locator</Link>
         </div>
    )
}