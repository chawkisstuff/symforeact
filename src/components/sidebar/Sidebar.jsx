import "./sidebar.css";
import home from '../../assets/Icons/home.png';
import Competences from '../../assets/Icons/Competences.png';
import skills from '../../assets/Icons/skills.png';
import candidates from '../../assets/Icons/candidates.png';
import { Link } from "react-router-dom";
import React, { useState } from "react";
export default function Sidebar() {

  const [isActive, setActive] = useState("false");
  const handleToggle = () => {
    setActive(!isActive);
  };
  
  return (
    <div className="sidebar">
      <div className="sidebarWrapper">
        <div className="sidebarMenu">
          <h3 className="sidebarTitle">Dashboard</h3>
          <ul className="sidebarList">
            <Link to="/" className="link">
            <li onClick={handleToggle} className={`sidebarListItem${isActive ? " active" : ""}`}>
              <img src={home} alt="" className="sidebarIcon" />
              <span className="sidebarText">Home</span>
            </li>
            </Link>
            <Link to="/candidatList" className="link">
              <li className="sidebarListItem">
                <img src={candidates} alt="" className="sidebarIcon" />
                Candidates
              </li>
            </Link>
            <Link to="/competenceList" className="link">
              <li className="sidebarListItem">
                <img src={skills} alt="" className="sidebarIcon" />
                <span className="sidebarText">Skills</span>
              </li>
            </Link>

            <Link to="/competenceList" className="link">
              <li className="sidebarListItem">
                <img src={Competences} alt="" className="sidebarIcon" />
                <span className="sidebarText">Competences</span>
              </li>
            </Link>

          </ul>
        </div>
        
      </div>
    </div>
  );
}
