import "./newCompetence.css";
import React, {useState, useEffect} from "react";
import {Link, useHistory, useParams } from 'react-router-dom';
import CandidatService from '../../components/services/CandidatService'

export default function NewUser() {
    const [nomCa, setFirstName] = useState('')
    const [prenomCa, setLastName] = useState('')
    const [email, setEmail] = useState('')
    const [phone, setPhone] = useState('')
    const [univ, setUniv] = useState('')
    const [diplome, setDiplome] = useState('')
    const history = useHistory();
    const {id} = useParams();
    
    const saveOrUpdateCandidat = (e) => {
      e.preventDefault();
    
    const candidat = {nomCa, prenomCa, email, phone, univ, diplome }
    CandidatService.createCandidat(candidat).then((response) => {
      history.push('/candidat')
            }).catch(error => {
                console.log(error)
            })
    }
    useEffect(() => {

        CandidatService.getCandidateById(id).then((response) =>{
            setFirstName(response.data.prenomCa)
            setLastName(response.data.nomCa)
            setEmail(response.data.email)
            setPhone(response.data.phone)
            setUniv(response.data.univ)
        }).catch(error => {
            console.log(error)
        })
    }, [])



  return (
    <div className="newUser">
      <h1 className="newUserTitle">New Candidate</h1>
      <form className="newUserForm">
        <div className="newUserItem">
          <label>First Name</label>
          <input 
            type="text" 
            placeholder="First name"
            value ={prenomCa}
            onChange ={(e) => setFirstName(e.target.value)} />
        </div>
        <div className="newUserItem">
          <label>Last Name</label>
          <input 
            type="text" 
            placeholder="Last name"
            value ={nomCa}
            onChange ={(e) => setLastName(e.target.value)} />
        </div>
        <div className="newUserItem">
          <label>Email</label>
          <input 
            type="email" 
            placeholder="candidat@gmail.com"
            value ={email}
            onChange ={(e) => setEmail(e.target.value)} />
        </div>
        <div className="newUserItem">
          <label>Phone</label>
          <input 
          type="text" 
          placeholder="+216 11 111 111"
          value ={phone}
          onChange ={(e) => setPhone(e.target.value)} />
        </div>
        <div className="newUserItem">
          <label>Univertity</label>
          <input 
            type="text" 
            placeholder="ISET NABEUL"
            value ={univ}
            onChange ={(e) => setUniv(e.target.value)} />
        </div>
        <div className="newUserItem">
          <label>Diploma</label>
          <input 
          type="text" 
          placeholder="Computer Science"
          value ={diplome}
          onChange ={(e) => setDiplome(e.target.value)} />
        </div>
        {/* <div className="newUserItem">
          <label>Active</label>
          <select className="newUserSelect" name="active" id="active">
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div> */}
        <button 
          className="newUserButton"
          onClick = {(e) => saveOrUpdateCandidat(e)}
          >Create</button>
      </form>
    </div>
  );
}
