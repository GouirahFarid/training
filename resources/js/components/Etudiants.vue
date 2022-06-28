<template>
    <div>
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <!--begin::Add product-->
                    <button @click="showUpdateEtudiantModel" class="btn btn-primary">Add Product</button>
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
                        <th class="min-w-100px">cne</th>
                        <th class="min-w-70px">prenom</th>
                        <th class="min-w-70px">Nom</th>
                        <th class="min-w-100px">date de naissance</th>
                        <th class="min-w-100px">Type de bac</th>
                        <th class="min-w-100px">Formation</th>
                        <th class="min-w-70px">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-600">
                    <tr v-for="etudiant in etudiants" :key="etudiant.id">

                        <td class="pe-0">
                            <span class="fw-bolder">{{etudiant.cne}}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.prenom }}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.nom }}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.date_naissance }}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.bac_type }}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.formation }}</span>
                        </td>
                        <td>
                            <button @click="showUpdateEtudiantModel(etudiant.id)" class="btn btn-primary">Edit</button>
                            <button @click="deleteEtudiant(etudiant.id)" class="btn btn-danger">Delete</button>
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
                            <h1 class="d-flex justify-content-center align-items-center mb-3">Select Users</h1>
                        </div>
                        <div class="mh-475px scroll-y me-n7 pe-7">
                            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                <label class="required form-label">Cross Sell Type</label>
                                <select id="crossSellSelect" class="form-select mb-2 select2-hidden-accessible" name="tax" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-74ud" tabindex="-1" aria-hidden="true">
                                    <option></option>
                                    <option value="1" selected="selected" data-select2-id="select2-data-18-j29w">Fixed Rate</option>
                                    <option value="2">Percent</option>
                                    <option value="3">By X and get Y for free</option>
                                    <option value="4">By X with Price</option>
                                </select>
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="required">Quantity</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's email." aria-label="Enter the contact's email."></i>
                                            </label>
                                            <input  id="crossSellQuantity" type="number" min="0" class="form-control form-control-solid" name="email" value="">
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="discount-label required">Discount(SAR)</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's phone number (optional)." aria-label="Enter the contact's phone number (optional)."></i>
                                            </label>
                                            <input id="crossSellDiscount" type="number" min="0" class="form-control form-control-solid" name="phone" value="">
                                        </div>
                                    </div>

                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Tittre</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's name." aria-label="Enter the contact's name."></i>
                                    </label>
                                    <input id="crossSellDescription" type="text" class="form-control form-control-solid" name="name" value="Buy [quantity] and [discount] discount">
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <button @click="createEtudiant" class="btn btn-success float-end"> Create</button>
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
    name: "Etudiants",
    data(){
        return{
            etudiants:{},
            etudiant:{
                id:null,
                cne:'',
                nom:'',
                prenom:'',
                bacType:'',
                dateNaissance:'',
                formation:null
            },
            isCreate:true
        }
    },
    created() {
        console.log('hello')
        axios.get('http://localhost:8000/api/etudiants')
            .then(response=>this.etudiants=response.data.data)
            .catch(function (error) {
                console.log(error);
            })
    },
    methods:{
        showCreateEtudiantModel(){
            let EtudiantModal = new bootstrap.Modal(document.getElementById('kt_modal_create_etudiant'));
            EtudiantModal.show()
        },
        showUpdateEtudiantModel(id){
            let etudiantModal = new bootstrap.Modal(document.getElementById('kt_modal_create_etudiant'));
            let currentEtudiant=this.etudiants.find(etudiant=>etudiant.id==id)
            this.etudiant={
                id:currentEtudiant.id,
                nom:currentEtudiant.nom,
                prenom:currentEtudiant.prenom,
                bacType:currentEtudiant.bacType,
                dateNaissance:currentEtudiant.dateNaissance,
                formation:currentEtudiant.formation
            };
            etudiantModal.show()
        },
        createEtudiant(){
            axios.post('http://localhost:8000/api/etudiants',
                {
                    cne:this.etudiant.cne,
                    nom:this.etudiant.nom,
                    prenom:this.etudiant.prenom,
                    bacType:this.etudiant.bacType,
                    dateNaissance:this.etudiant.dateNaissance,
                    formation:this.etudiant.formation.id
                }
            )
                .then(()=>{
                    let etudiantModal = new bootstrap.Modal(document.getElementById('kt_modal_create_etudiant'));
                    etudiantModal.hide();
                    this.etudiant={
                        id:null,
                            cne:'',
                            nom:'',
                            prenom:'',
                            bacType:'',
                            dateNaissance:'',
                            formation:null
                    }
                    this.getAllEtudiants();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        updateEtudiant(){
            axios.put(`http://localhost:8000/api/etudiants/${this.formation.id}`,
                {
                    nom:this.etudiant.nom,
                    prenom:this.etudiant.prenom,
                    bacType:this.etudiant.bacType,
                    dateNaissance:this.etudiant.dateNaissance,
                    formation:this.etudiant.formation.id
                }
                )
                .then(()=>{
                    let etudiantModal = new bootstrap.Modal(document.getElementById('kt_modal_create_formation'));
                    etudiantModal.hide();
                    this.etudiant={
                        id:null,
                        cne:'',
                        nom:'',
                        prenom:'',
                        bacType:'',
                        dateNaissance:'',
                        formation:null
                    }
                    this.getAllEtudiants();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        deleteEtudiant(id){
            axios.delete(`http://localhost:8000/api/etudiants/${id}`,)
                .then(()=>{
                    this.etudiants=this.etudiants.filter(etudiant=>etudiant.id!=id)
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getAllEtudiants(){
            axios.get('http://localhost:8000/api/etudiants')
                .then(response=>this.etudiants=response.data.data)
                .catch(function (error) {
                    console.log(error);
                })
        }


    }
}
</script>

<style scoped>

</style>
