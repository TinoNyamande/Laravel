import { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import Navbar from '../Layouts/Navbar';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('login'));
    };

    return (
        <>
    
            <Head title="Log in" />
           <Navbar/>
            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <form className=' myform'  onSubmit={submit}>
                <h2>Enter your details  to log in</h2>
                <a href={route('register')}>Click here if you already have an account</a>
                <div>
                    <InputLabel forInput="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="form-control"
                        autoComplete="username"
                        isFocused={true}
                        handleChange={onHandleChange}
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div >
                    <InputLabel forInput="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="form-control"
                        autoComplete="current-password"
                        handleChange={onHandleChange}
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div >
                    <label>
                        <Checkbox name="remember" value={data.remember} handleChange={onHandleChange} />
                        <span >Remember me</span>
                    </label>
                </div>

               
                    <div>

                    <PrimaryButton className="btn btn-success form-control" processing={processing}>
                        Log in
                    </PrimaryButton>
                </div>
                <div>
                    {canResetPassword && (
                        <Link
                            href={route('password.request')}
                        >
                            Forgot your password?
                        </Link>
                    )}
                    </div>
            </form>
        </>
    );
}
