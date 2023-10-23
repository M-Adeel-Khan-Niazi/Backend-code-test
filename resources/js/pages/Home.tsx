import React, {useEffect, useState} from "react";
import axios from 'axios';
import EmployeesTable from "../components/EmployeeTable";

const Home = () => {
    const [records, setRecords] = useState([]);

    const getEmployees = () => {
        axios.get('api/employees').then(res => {
            setRecords(res.data.employees);
        }).catch(err => {
            console.log(err);
        })
    }

    useEffect(() => {
        getEmployees();
    }, []);

    return (
        <div>
            <div className="container mx-auto">
                <h1 className="text-3xl pt-5 text-gray-500 font-bold">List of employees</h1>
                <EmployeesTable records={records}/>
            </div>
        </div>
    );
};
export default Home;
