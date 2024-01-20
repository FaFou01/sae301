<div id="ajoutProduit">
    <h1>Ajouter un produit</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div id="NC">
            <div id="nom" class="conteneur">
                <label for="">Nom du produit :</label>
                <input type="text" name="productName" id="" required>
            </div>
            <div id="cible" class="conteneur">
                <label for="">Cible du produit :</label>
                <select name="productTarget" id="" required>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="PP">Petits prix</option>
                </select>
            </div>
        </div>
        <div id="PTQ">
            <div id="prix" class="conteneur">
                <label for="">Prix :</label>
                <input type="number" name="productPrice" id="" required>
            </div>
            <div id="type" class="conteneur">
                <label for="">Type :</label>
                <select name="productType" id="" required>
                    <option value="Eau_de_Toilette">Eau de Toilette</option>
                    <option value="Déodorant">Déodorant</option>
                    <option value="Eau_de_Cologne">Eau de Cologne</option>
                    <option value="Parfum">Parfum</option>
                    <option value="Eau_de_Parfum">Eau de Parfum</option>
                    <option value="Parfum_pour_cheveux">Parfum pour cheveux</option>
                </select>
            </div>
            <div id="quantité" class="conteneur">
                <label for="">Quantité :</label>
                <input type="number" name="productQuantity" id="" required>
            </div>
        </div>
        <div id="IM">
            <div id="image" class="conteneur">
                <label for="">Image :</label>
                <input type="file" name="productPicture" id="productPicture" required>
            </div>
            <div id="marque" class="conteneur">
                <label for="">Marque :</label>
                <input type="text" name="productBrand" id="" required>
            </div>
        </div>
        <div id="description" class="conteneur">
            <label for="">Description :</label>
            <textarea name="productDesc" id="" cols="30" rows="10" required></textarea>
        </div>
        <div id="conseils" class="conteneur">
            <label for="">Conseils :</label>
            <textarea name="productAdvice" id="" cols="30" rows="10" required></textarea>
        </div>
        <div id="ingredients" class="conteneur">
            <label for="">Ingrédients :</label>
            <input type="text" name="productIngredient" id="" required>
        </div>
        <input type="submit" value="Valider">
        
    </form>
</div>