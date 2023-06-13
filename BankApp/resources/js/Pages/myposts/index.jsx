import LoginNavbar from "../Layouts/LoginNavbar"
export default function Index(props) {
    const posts = props.post;
    if (posts.balance==null) {
        posts.balance = "0.00";
    }
    return (
        <>
        <LoginNavbar/><br/><br/>
        <div className="container">
            <h1>Account Details</h1>
            <table className="table table-striped">
                <thead>
                <tr>
                <th>Account Number</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{posts.id}</td>
                    <td>{posts.name}</td>
                    <td>{posts.surname}</td>
                    <td>{posts.address}</td>
                </tr>
                </tbody>
            </table>
        </div>
        </>
    )
}