import React from "react";
import Sidebar from "./components/sidebar/Sidebar";
import Topbar from "./components/topbar/Topbar";
import "./App.css";
import Home from "./pages/home/Home";
import { BrowserRouter as Router, Switch, Route, Redirect } from "react-router-dom";
import candidatList from "./pages/candidatList/candidatList";
import competenceList from "./pages/competenceList/competenceList";
import skillList from "./pages/skillList/skillList";
import candidat from "./pages/candidat/candidat";
import competence from "./pages/competence/competence";
import skill from "./pages/skill/skill";
import newCandidat from "./pages/newCandidat/newCandidat";
import newCompetence from "./pages/newCompetence/newCompetence";
import newSkill from "./pages/newSkill/newSkill";
import LogIn from "./pages/logIn/logIn";
import signUp from "./pages/signUp/signUp";
import evaluation from "./pages/evaluation/evaluation";
import {isAuth} from './utils/isAuth.util';

function ProtectedRoute({ component: Component,  ...restProps }) {  
  return <Route 
    {...restProps}
    render={(props) => isAuth() ? <Component {...props} /> : <Redirect to='/login' />}
  />
}

function App() {
  return (
    <Router>
        <Switch>
          {/* public routes */}
          <Route exact path={["/login", "/"]} component={LogIn} />
          <Route exact path={["/signUp"]} component={signUp} />
          <Route exact path="/evaluation" component={evaluation} />
          {/* private routes */}
          <>
          <ProtectedRoute exact path="/home" component={Home} />
          <ProtectedRoute exact path="/candidatList" component={candidatList} />
          <ProtectedRoute exact path="/skillList" component={skillList} />
          <ProtectedRoute exact path="/candidat" component={candidat} />
          <ProtectedRoute exact path="/competence" component={competence} />
          <ProtectedRoute exact path="/skill" component={skill} />
          <ProtectedRoute exact path="/newCandidat" component={newCandidat} />
          <ProtectedRoute exact path="/newCompetence" component={newCompetence} />
          <ProtectedRoute exact path="/newSkill" component={newSkill} />
          <ProtectedRoute exact path="/competenceList" component={competenceList} />
          <ProtectedRoute exact path="/evaluation" component={evaluation} />
        </>
        </Switch>
    </Router>
    );
  
}

export default App;
