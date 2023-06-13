import LoginNavbar from "../Layouts/LoginNavbar";
export default function Statement(props) {
      const stats = props.stats;
      //const bal = props.bal;

      return (
        <>
        <LoginNavbar/>
        <table className="table container">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>To/From</th>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                {stats.map((stat)=>(
                    <tr key ={stat.id}>
                        <td>{stat.created_at}</td>
                        <td>{stat.amount}</td>
                        <td>{stat.type}</td>
                        <td>{stat.description}</td>
                        <td>{stat.accountNumber}</td>
            
                    </tr>
                ))}
                <tr>
                    <td><strong>Balance</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>${props.bal}</td>
                </tr>
            </tbody>
      </table>
        </>
      )
}