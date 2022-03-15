import axios from 'axios';

const SKILL_API_BASE_URL = "http://127.0.0.1:8000/skill/list";

class SkillService{

    getSkill(){
        return axios.get(SKILL_API_BASE_URL+"/get");
    }
    createSkill(skill){
        return axios.post(SKILL_API_BASE_URL+"/new");
    }
    editSkill(id){
        return axios.put(SKILL_API_BASE_URL+'/'+id+'/'+"edit");
    }
    deleteSkill(id){
        return axios.delete(SKILL_API_BASE_URL+ '/' + id);
    }
}

export default new SkillService()