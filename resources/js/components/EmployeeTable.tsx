import React from 'react';

interface EmployeeRecord {
    name: string;
    email: string;
    created_at: Date;
}

interface EmployeesTableProps {
    records: EmployeeRecord[];
}

const EmployeesTable: React.FC<EmployeesTableProps> = ({ records }) => {
    return (
        <table className="table-auto">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            {records.map((record, index) => (
                <tr key={index}>
                    <td>{record.name}</td>
                    <td>{record.email}</td>
                    <td>{record.created_at.toString()}</td>
                </tr>
            ))}
            </tbody>
        </table>
    );
};

export default EmployeesTable;
