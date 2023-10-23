import React from 'react';
import {useNavigate} from "react-router-dom";

interface EmployeeRecord {
    id: string;
    name: string;
    email: string;
    created_at: Date;
}

interface EmployeesTableProps {
    records: EmployeeRecord[];
}

const EmployeesTable: React.FC<EmployeesTableProps> = ({ records }) => {

    const navigate = useNavigate();

    return (
        <div className="overflow-hidden mt-10">
            <table className="min-w-full text-left text-sm font-light">
                <thead className="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" className="px-5 py-4">#</th>
                        <th scope="col" className="px-5 py-4">Name</th>
                        <th scope="col" className="px-5 py-4">Email</th>
                        <th scope="col" className="px-5 py-4">Created At</th>
                        <th scope="col" className="px-5 py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                {records.map((record, index) => (
                    <tr className="border-b dark:border-neutral-500" key={index}>
                        <td className="whitespace-nowrap px-5 py-4 font-medium">{index+1}</td>
                        <td className="whitespace-nowrap px-5 py-4">{record.name}</td>
                        <td className="whitespace-nowrap px-5 py-4">{record.email}</td>
                        <td className="whitespace-nowrap px-5 py-4">{new Date(record.created_at).toDateString()}</td>
                        <td className="whitespace-nowrap px-5 py-4">
                            <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    onClick={() => navigate(`/${record.id}/attendance`)}>
                                Show Attendance
                            </button>
                        </td>
                    </tr>
                ))}
                </tbody>
            </table>
        </div>
    );
};

export default EmployeesTable;
