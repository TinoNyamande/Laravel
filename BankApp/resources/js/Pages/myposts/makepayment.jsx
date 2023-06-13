import LoginNavbar from "../Layouts/LoginNavbar"
import { useEffect } from 'react';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Makepayment() {
    const { data, setData, post, processing, errors, reset } = useForm({
        recepient: '',
        amount:'',
        description:'',
        password:'',
    });

    

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('pay'));
    };

    return (
        <div className="container">
            <LoginNavbar/>
            <form onSubmit={submit} className="container">
                <label>Recepient Account Number</label><br/>
                <input name="recepient" value={data.recepient} className="form-control" onChange={onHandleChange}/>
                <label>Amount</label><br/>
                <input name="amount" value={data.amount} className="form-control" onChange={onHandleChange}/>
                <label>Description</label><br/>
                <input name="description" value={data.description} className="form-control" onChange={onHandleChange}/><br/>
                <button type="submit" className="btn btn-primary form-control">Pay</button>
            </form>
        </div>
    )
}