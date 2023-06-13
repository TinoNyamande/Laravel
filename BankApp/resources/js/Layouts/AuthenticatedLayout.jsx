import { useState } from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import Dropdown from '@/Components/Dropdown';
import NavLink from '@/Components/NavLink';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import { Link } from '@inertiajs/react';

export default function Authenticated({ auth, header, children }) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    return (
        <>
        <div className='dashboard'>
            <h1>
               Logged in as:  {auth.user.name}   
            </h1>
            </div><div>
            <Link className='btn btn-danger btn-sm' href={route('profile.edit')}>Profile</Link>
            <Link className='btn btn-danger btn-sm' href={route('logout')} method="post" as="button">Log Out</Link>
        </div>
        </>
    );
}
