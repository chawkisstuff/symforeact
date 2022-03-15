import { DataGrid } from "@material-ui/data-grid";
import { DeleteOutline } from "@material-ui/icons";
import React, {useState, useEffect, Link} from "react";
import SkillService from "../../services/SkillService";

export default function CompetenceList() {
  const [isLoaded,setIsLoaded] = useState(false);
  const [rowData,setRowData] = useState([]);
  useEffect(() => {
  const axios = require('axios').default;
  axios
  .get('http://127.0.0.1:8000/skill/get')
  .then((response) => {
  setIsLoaded(true);
  console.log(response.data);
  setRowData(response.data);
  });
  }, []);
  const handleDelete = (id) => SkillService.deleteCandidat(id);
  const columns = [
    { field: "nomC", headerName: "SKILL", width: 250 },
    {
      field: "action",
      headerName: "Action",
      width: 150,
      renderCell: (params) => {
        return (
          <>
            <Link to={"/user/" + "id"}>
              <button className="userListEdit">Edit</button>
            </Link>
            <DeleteOutline
              className="userListDelete" onClick={() => handleDelete("id")}
            />
          </>
        );
      },
    },
    ];
    return(
      <div style={{ height: 400, width: '100%' }}>
      <div style={{ display: 'flex', height: '100%' }}>
      <div style={{ flexGrow: 1 }}>
      <DataGrid
      columns={columns}
      rows={rowData}
      id="id"
      pageSize={15}
      />
      </div>
      </div>
      </div>
      );
}
