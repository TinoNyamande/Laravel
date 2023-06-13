import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import Navbar from '../Layouts/Navbar';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        surname:'',
        dob:'',
        address:'',
        phone:'',
        natId:'',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('register'));
    };

    return (
        <div>
            <Head title="Register" />
            <Navbar/>

            <form className='myform' onSubmit={submit}>
                <h2>Fill in the form to create account</h2><br/>
            <div>
                    <Link
                        href={route('login')}
                    >
                        Click here if you already have an account
                    </Link>
            </div><br/>
                <div>
                    <InputLabel forInput="name" value="Name" />

                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="form-control"
                        autoComplete="name"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.name}  />
                </div>

                <div>
                    <InputLabel forInput="surname" value="Surname" />

                    <TextInput
                        id="surname"
                        name="surname"
                        value={data.surname}
                        className="form-control"
                        autoComplete="name"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.surname}  />
                </div>

                <div>
                    <InputLabel forInput="dob" value="Date of birth" />

                    <TextInput
                        id="dob"
                        name="dob"
                        type="date"
                        value={data.dob}
                        className="form-control"
                        autoComplete="name"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.name}  />
                </div>

                <div>
                    <InputLabel forInput="phone" value="Phone" />

                    <TextInput
                        id="phone"
                        name="phone"
                        value={data.phone}
                        className="form-control"
                        autoComplete="name"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.phone}  />
                </div>

                <div>
                    <InputLabel forInput="address" value="Address" />

                    <TextInput
                        id="address"
                        name="address"
                        value={data.address}
                        className="form-control"
                        autoComplete="name"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.address}  />
                </div>

                <div>
                    <InputLabel forInput="natId" value="National Id Number" />

                    <TextInput
                        id="natId"
                        name="natId"
                        value={data.natId}
                        className="form-control"
                        autoComplete="name"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.natId}  />
                </div>

                <div >
                    <InputLabel forInput="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="form-control"
                        autoComplete="username"
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.email} />
                </div>

                <div >
                    <InputLabel forInput="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="form-control"
                        autoComplete="new-password"
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.password}  />
                </div>

                <div >
                    <InputLabel forInput="password_confirmation" value="Confirm Password" />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="form-control"
                        autoComplete="new-password"
                        handleChange={onHandleChange}
                        required
                    />

                    <InputError message={errors.password_confirmation} />
                </div>

                
                    <div >

                    <PrimaryButton className='btn btn-success form-control ' processing={processing}>
                        Create
                    </PrimaryButton>
                    <button className='btn btn-danger form-control ' >
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    );
}
