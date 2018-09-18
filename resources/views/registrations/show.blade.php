<modal v-if="showInfoModal" @close="showInfoModal = false" ref="modal">
<span slot="title">Taotlus #<span v-text="activeRow.id"></span></span>
        <p class="title is-5">Võimleja andmed</p>
        <table class="table is-bordered is-striped is-narrow">
            <tr>
                <td style="width:200px;"><b>Rühm:</b></td>
                <td v-text="activeRow.field.name"></td>
            </tr>
            <tr>
                <td><b>Võimleja nimi:</b></td>
                <td v-text="activeRow.student.name"></td>
            </tr>
            <tr>
                <td><b>Võimleja vanus:</b></td>
                <td v-text="activeRow.student.age"></td>
            </tr>
            <tr>
                <td><b>Kommentaar:</b></td>
                <td v-text="activeRow.comment"></td>
            </tr>
            <tr>
                <td style="width:200px;"><b>Kontaktisiku nimi:</b></td>
                <td v-text="activeRow.parent1.name"></td>
            </tr>
            <tr>
                <td><b>Kontaktisiku telefon:</b></td>
                <td v-text="activeRow.parent1.phone"></td>
            </tr>
            <tr>
                <td><b>Kontaktisiku e-post:</b></td>
                <td v-text="activeRow.parent1.email"></td>
            </tr>
        </table>
</modal>
