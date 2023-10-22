import React from 'react';

interface AttendanceRecord {
    employee_name: string;
    checkin: string | null;
    checkout: string | null;
    total_working_hours: number | null;
}

interface AttendanceTableProps {
    records: AttendanceRecord[];
}

const AttendanceTable: React.FC<AttendanceTableProps> = ({ records }) => {
    return (
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Total Working Hours</th>
            </tr>
            </thead>
            <tbody>
            {records.map((record, index) => (
                <tr key={index}>
                    <td>{record.employee_name}</td>
                    <td>{record.checkin || 'N/A'}</td>
                    <td>{record.checkout || 'N/A'}</td>
                    <td>{record.total_working_hours !== null ? record.total_working_hours : 'N/A'}</td>
                </tr>
            ))}
            </tbody>
        </table>
    );
};

export default AttendanceTable;
