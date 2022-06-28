<template>
    <div>
        <div class="card card-flush border-0">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <!--begin::Add product-->
                    <button @click="showCreateFormationModel" class="btn btn-primary">Ajouter Formation</button>
                    <!--end::Add product-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table  table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                    <!--begin::Table head-->
                    <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-100px">Titre</th>
                        <th class="min-w-70px">Heures</th>
                        <th class="min-w-100px">Nombre d'étudiants</th>
                        <th class="min-w-70px">Operations</th>
                    </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-600 border-top-0">
                        <tr v-for="formation in formations" :key="formation.id">

                            <td class="pe-0">
                                <span class="fw-bolder">{{formation.titre}}</span>
                            </td>
                            <td class="pe-0">
                                <span class="fw-bolder">{{ formation.heures }}</span>
                            </td>
                            <td class="pe-0">
                                <span class="fw-bolder">{{ formation.etudiants_count }}</span>
                            </td>
                        <td>
                            <button @click="showUpdateFormationModel(formation.id)" class="btn btn-primary">Éditer</button>
                            <button @click="deleteFormation(formation.id)" class="btn btn-danger">Supprimer</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="kt_modal_create_formation" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog mw-700px">
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 d-flex justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                        <div class="text-center mb-13">
                            <h1 class="d-flex justify-content-center align-items-center mb-3">Créer Formation</h1>
                        </div>
                        <div v-if="errors.length>0" class="alert alert-danger" role="alert">
                            <ul>
                                <li v-for="(error,index) in errors" :key="index">{{error}}</li>
                            </ul>
                        </div>
                        <div class="mh-475px scroll-y me-n7 pe-7">
                            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Tittre</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's name." aria-label="Enter the contact's name."></i>
                                    </label>
                                    <input v-model="formation.titre" type="text" class="form-control form-control-solid" name="name" value="Buy [quantity] and [discount] discount">
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="discount-label required">Heures</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's phone number (optional)." aria-label="Enter the contact's phone number (optional)."></i>
                                    </label>
                                    <input v-model="formation.heures" type="number" min="0" class="form-control form-control-solid" name="phone" value="">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <button @click="createFormation" class="btn btn-success float-end"> Créer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="kt_modal_update_formation" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog mw-700px">
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 d-flex justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                        <div class="text-center mb-13">
                            <h1 class="d-flex justify-content-center align-items-center mb-3">Mettre à jour Formation</h1>
                        </div>
                        <div v-if="errors.length>0" class="alert alert-danger" role="alert">
                            <ul>
                                <li v-for="(error,index) in errors" :key="index">{{error}}</li>
                            </ul>
                        </div>
                        <div class="mh-475px scroll-y me-n7 pe-7">
                            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Tittre</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's name." aria-label="Enter the contact's name."></i>
                                    </label>
                                    <input v-model="formation.titre" type="text" class="form-control form-control-solid" name="name" value="Buy [quantity] and [discount] discount">
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="discount-label required">Heures</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's phone number (optional)." aria-label="Enter the contact's phone number (optional)."></i>
                                    </label>
                                    <input v-model="formation.heures" type="number" min="0" class="form-control form-control-solid" name="phone" value="">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <button @click="UpdateFormation" class="btn btn-success float-end">Mettre à jour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Formation",
    data(){
        return{
            formations:{},
            formation:{
                id:null,
                titre:'',
                heures:0
            },
            errors:[]
        }
    },
    created() {
        axios.get('formations')
            .then(response=>this.formations=response.data.data)
            .catch(({response})=>{
                this.errors= Object.values(response.data.errors).map(error=>error[0]);
            });
    },
    methods:{
        showCreateFormationModel(){
            let formationModal = new bootstrap.Modal(document.getElementById('kt_modal_create_formation'));
            this.errors=[]
            formationModal.show()
        },
        showUpdateFormationModel(id){
            let formationModal = new bootstrap.Modal(document.getElementById('kt_modal_create_formation'));
            let currentFormation=this.formations.find(formation=>formation.id==id)
            this.formation.id=currentFormation.id;
            this.formation.titre=currentFormation.titre;
            this.formation.heures=currentFormation.heures;
            this.errors=[]
            formationModal.show()
        },
        createFormation(){
            axios.post('formations',{titre:this.formation.titre,heures:this.formation.heures})
                .then(()=>{
                    let formationModal = new bootstrap.Modal(document.getElementById('kt_modal_create_formation'));
                    formationModal.hide();
                    this.formation.titre='';
                    this.formation.heures='';
                    this.errors=[]
                    this.getAllFormations();
                })
                .catch(({response})=>{
                    this.errors= Object.values(response.data.errors).map(error=>error[0]);
                });
        },
        UpdateFormation(){
            axios.put(`formations/${this.formation.id}`,{titre:this.formation.titre,heures:this.formation.heures})
                .then(()=>{
                    let formationModal = new bootstrap.Modal(document.getElementById('kt_modal_create_formation'));
                    formationModal.hide();
                    this.formation.id=null;
                    this.formation.titre='';
                    this.formation.heures='';
                    this.errors=[]
                    this.getAllFormations();
                })
                .catch(({response})=>{
                    this.errors= Object.values(response.data.errors).map(error=>error[0]);
                });
        },
        deleteFormation(id){
            axios.delete(`formations/${id}`,)
                .then(()=>{
                    this.errors=[]
                    this.formations=this.formations.filter(formation=>formation.id!=id)
                })
                .catch(({response})=>{
                    this.errors= Object.values(response.data.errors).map(error=>error[0]);
                });
        },
        getAllFormations(){
            axios.get('formations')
                .then(response=>this.formations=response.data.data)
                .catch(({response})=>{
                    this.errors= Object.values(response.data.errors).map(error=>error[0]);
                });
        }


    }
}
</script>

<style scoped>
.form-control{
    background-color: #bdeef987;
    padding: 10px;
}
</style>
