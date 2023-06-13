import { Link, Head } from '@inertiajs/react';
import Navbar from './Layouts/Navbar';

export default function Welcome(props) {
    return (
        <>
            <Head title="Welcome" />
            <Navbar/>
                <div className="auth">
                    {props.auth.user ? (
                        <Link className='mylink'
                            href={route('myposts.index')}
                        >
                            Dashboard
                        </Link>
                    ) : (
                        <>
                            <Link className='mylink'
                                href={route('login')}
                                
                            >
                                Log in
                            </Link>

                            <Link className='mylink'
                                href={route('register')}
                            >
                                Create account
                            </Link>
                        </>
                    )}
                </div>
                <div className='mynavbar'>
                    <a>Banking</a>
                    <a>Insurance</a>
                    <a>Investments</a>
                    <a>Blog</a>
                </div>

                            
        </>
    );
}
