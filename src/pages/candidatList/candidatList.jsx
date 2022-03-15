import "./candidatList.css";
import { DataGrid } from "@material-ui/data-grid";
import { DeleteOutline } from "@material-ui/icons";
import { Link } from "react-router-dom";
import React, { useState, useEffect } from "react";
import CandidatService from '../../services/CandidatService';
import axios from 'axios'

function deleteCandidateService(id) {
  return axios.delete(`http://127.0.0.1:8000/api/candidats/${id}`)
}

export default function UserList() {

  const [rowData, setRowData] = useState([]);

  useEffect(() => {
    (async () => {
      const response = await axios.get('http://127.0.0.1:8000/api/candidats')
      setRowData(response.data);
    })()
  }, []);

  const handleDelete = async (id) => {
    await deleteCandidateService(id).catch(console.error);
    return
  };


  const columns = [
    { field: "nomCa", headerName: "Name", width: 140 },
    { field: "email", headerName: "EMAIL", width: 200 },
    { field: "tel", headerName: "PHONE", width: 120 },
    { field: "univ", headerName: "UNIVERSITY", width: 200 },
    { field: "diplome", headerName: "DIPLOME", width: 200 },
    {
      field: "action",
      headerName: "Action",
      width: 150,
      renderCell: (params) => {
        return (
          <>
            <Link to={"/user/" + params.id}>
              <button className="userListEdit">Edit</button>
            </Link>
            <DeleteOutline
              className="userListDelete" onClick={() => handleDelete(params.id)}
            />
          </>
        );
      },
    },
  ];
  return (
    <div style={{ height: 600, width: '100%' }}>
      <div style={{ display: 'flex', height: '100%' }}>
        <div style={{ flexGrow: 4 }}>
          <DataGrid
            columns={columns}
            rows={rowData}
            id="id"
            pageSize={20}
          />
          <div style={{ filter: true, floatingFilter: true }}>
          </div>
        </div>
      </div>
    </div>
  );
}
