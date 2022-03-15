import "./evaluation.css";
import React, {useState, useEffect} from "react";
import {Link, useHistory, useParams } from 'react-router-dom';
import CandidatService from '../../components/services/CandidatService'
import axios from 'axios';

function getSkillsService () {
  console.log('------------get-sss');
  return axios.get('http://127.0.0.1:8000/api/skills')
}

function getCandidaturesService () {
  console.log('---------get cand-')
  return axios.get('http://127.0.0.1:8000/api/candidats/')
}

function createEvaluation (data) {
  console.log('---------post evt-')

  return axios.post('http://127.0.0.1:8000/api/skill_cands', data)
}

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

export default function NewUser() {
  const [form, setForm] = useState({
    candidate: '',
    skill: '',
    candidatures: [],
    skills: [],
    level: ''
  });
  const handleChange = (e) => setForm({ ...form, [e.target.name]: e.target.value });

  useEffect(() => {
    (async () => {
      const responseC = await getCandidaturesService().catch(console.log);
      await sleep(2000);
      const responseS = await getSkillsService().catch(console.log);

      setForm({
        ...form,
        candidatures: responseC.data['hydra:member'],
        skills: responseS.data['hydra:member']
      })
    })()
  }, [])

  const handleClick = async () => {
    console.log(form)
    const idCandidate = form.candidatures.find(c => c.nomCa === form.candidate).id
    const idSkill = form.skills.find(s => s.nomS === form.skill).id
    
    await createEvaluation({
      "date": "2022-03-08T22:17:15.139Z",
      "level": form.level || "string",
      "skill": `/api/skills/${idSkill|| 1}`,
      "candidat": `/api/candidats/${idCandidate|| 2}`,
      "idE": "/api/evaluateurs/1"
    });

    setForm({
      ...form,
      candidate: '',
      skill: '',
      level: ''
    })
  }

  return (
    <div className="newUser">
      <h1 className="newUserTitle">New Evaluation</h1>
        <div className="newUserItem">
          <label>CANDIDATE</label>
        </div>
        <div>
      <select name="candidate" onChange={handleChange}>
        {form.candidatures.map((c) => (<option key={c.id} value={c.nomCa}>
          {c.nomCa}
        </option>))}
      </select>

        <div className="newUserItem">
          <label>SKILL</label>
      <select name="skill" onChange={handleChange}>
        {form.skills.map((c) => (<option key={c.id} value={c.nomS}>
          {c.nomS}
        </option>))}
      </select>
      </div>
          <div className="newUserItem">
          <label>Level</label>
      <input name="level" onChange={handleChange} />
      </div>
      <a href="http://localhost:3001/candidatList">
          <button className="newUserButton" onClick={handleClick}> submit evaluation </button>
      </a>
    </div>
    </div>
  );
}
