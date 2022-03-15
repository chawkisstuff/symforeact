import {React, Link} from "react";
import "./topbar.css";
import { NotificationsNone, Language, Settings } from "@material-ui/icons";
import storage from '../../utils/storage.util'

export default function Topbar() {
  return (
    <div className="topbar">
      <div className="topbarWrapper">
        <div className="topLeft">
          <span className="logo">LOGO</span>
        </div>

          <button className="topRight" onClick={() => storage.reInit()}>logout</button>

      </div>
    </div>
  );
}
