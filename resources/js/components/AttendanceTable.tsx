import React from 'react';
import moment from 'moment';

interface AttendanceRecord {
    employee: {
        name: string,
        email: string
    };
    check_in: Date;
    check_out: Date;
    total_hours: number | null;
}

interface AttendanceTableProps {
    records: AttendanceRecord[];
}

const AttendanceTable: React.FC<AttendanceTableProps> = ({ records }) => {
    return (
        <div className="overflow-hidden mt-10">
            <table className="min-w-full text-left text-sm font-light">
                <thead className="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" className="px-5 py-4">Name</th>
                    <th scope="col" className="px-5 py-4">Check-In</th>
                    <th scope="col" className="px-5 py-4">Check-Out</th>
                    <th scope="col" className="px-5 py-4">Total Working Hours</th>
                </tr>
                </thead>
                <tbody>
                {records.map((record, index) => (
                    <tr className="border-b dark:border-neutral-500" key={index}>
                        <td className="whitespace-nowrap px-5 py-4">{record.employee.name}</td>
                        <td className="whitespace-nowrap px-5 py-4">{moment(record.check_in).format('Y-M-D HH:mm')}</td>
                        <td className="whitespace-nowrap px-5 py-4">{moment(record.check_out).format('Y-M-D HH:mm')}</td>
                        <td className="whitespace-nowrap px-5 py-4 font-medium">{record.total_hours}</td>
                    </tr>
                ))}
                </tbody>
            </table>
        </div>
    );
};

export default AttendanceTable;
