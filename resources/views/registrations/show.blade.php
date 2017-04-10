<modal v-if="showInfoModal" @close="showInfoModal = false" ref="modal">
<span slot="title">Taotlus #<span v-text="activeRow.id"></span></span>
        <p class="title is-5">Võimleja andmed</p>
        <table class="table is-bordered is-striped is-narrow">
            <tr>
                <td style="width:200px;"><b>Rühm:</b></td>
                <td v-text="activeRow.field.name"></td>
            </tr>
            <tr>
                <td><b>Nimi:</b></td>
                <td v-text="activeRow.student.name"></td>
            </tr>
            <tr>
                <td><b>Isikukood:</b></td>
                <td v-text="activeRow.student.personal_code"></td>
            </tr>
            <tr>
                <td><b>Vanus:</b></td>
                <td v-text="activeRow.student.age"></td>
            </tr>
            <tr>
                <td><b>Aadress:</b></td>
                <td v-text="activeRow.student.address"></td>
            </tr>
            <tr>
                <td><b>Telefon:</b></td>
                <td v-text="activeRow.student.phone"></td>
            </tr>
            <tr>
                <td><b>E-post:</b></td>
                <td v-text="activeRow.student.email"></td>
            </tr>
            <tr>
                <td><b>Kommentaar:</b></td>
                <td v-text="activeRow.comment"></td>
            </tr>
        </table>

        <p class="title is-5">Esimese vanema andmed</p>
        <table class="table is-bordered is-striped is-narrow">
            <tr>
                <td style="width:200px;"><b>Nimi:</b></td>
                <td v-text="activeRow.parent1.name"></td>
            </tr>
            <tr>
                <td><b>Isikukood:</b></td>
                <td v-text="activeRow.parent1.personal_code"></td>
            </tr>
            <tr>
                <td><b>Aadress:</b></td>
                <td v-text="activeRow.parent1.address"></td>
            </tr>
            <tr>
                <td><b>Telefon:</b></td>
                <td v-text="activeRow.parent1.phone"></td>
            </tr>
            <tr>
                <td><b>E-post:</b></td>
                <td v-text="activeRow.parent1.email"></td>
            </tr>
            <tr>
                <td><b>Töökoht:</b></td>
                <td v-text="activeRow.parent1.work_place"></td>
            </tr>
        </table>

        <p class="title is-5">Teise vanema andmed</p>
        <table class="table is-bordered is-striped is-narrow">
            <tr>
                <td style="width:200px;"><b>Nimi:</b></td>
                <td><span v-if="activeRow.parent2" v-text="activeRow.parent2.name"></span></td>
            </tr>
            <tr>
                <td><b>Isikukood:</b></td>
                <td><span v-if="activeRow.parent2" v-text="activeRow.parent2.personal_code"></span></td>
            </tr>
            <tr>
                <td><b>Aadress:</b></td>
                <td><span v-if="activeRow.parent2" v-text="activeRow.parent2.address"></span></td>
            </tr>
            <tr>
                <td><b>Telefon:</b></td>
                <td><span v-if="activeRow.parent2" v-text="activeRow.parent2.phone"></span></td>
            </tr>
            <tr>
                <td><b>E-post:</b></td>
                <td><span v-if="activeRow.parent2" v-text="activeRow.parent2.email"></span></td>
            </tr>
            <tr>
                <td><b>Töökoht:</b></td>
                <td><span v-if="activeRow.parent2" v-text="activeRow.parent2.work_place"></span></td>
            </tr>

        </table>

</modal>
