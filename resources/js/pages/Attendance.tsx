import React, {useEffect, useState} from "react";
import axios from 'axios';
import AttendanceTable from "../components/AttendanceTable";
import {useNavigate, useParams} from "react-router-dom";

const Attendance = () => {
    const [records, setRecords] = useState([]);
    const {ID} = useParams();
    const navigate = useNavigate();

    const getEmployeeAttendance = (employee_id: string) => {
        axios.get(`/api/attendance/${employee_id}`).then(res => {
            setRecords(res.data.attendances);
        }).catch(err => {
            console.log(err);
        })
    }

    useEffect(() => {
        getEmployeeAttendance(ID as string);
    }, []);

    return (
        <div>
            <div className="container mx-auto">
                <div className="flex pt-5">
                    <button
                        onClick={() => navigate(-1)}
                        className="bg-transparent mr-2 hover:bg-blue-500 text-gray-500 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">
                        Back
                    </button>
                    <h1 className="text-3xl text-gray-500 font-bold">List of attendances</h1>
                </div>
                <AttendanceTable records={records}/>
            </div>
        </div>
    );
};
export default Attendance;
