document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-submenu').forEach(item => {
        item.addEventListener('mouseover', function () {
            const submenu = this.nextElementSibling;
            submenu.style.display = 'block';
        });

        item.addEventListener('mouseout', function () {
            const submenu = this.nextElementSibling;
            submenu.style.display = 'none';
        });
    });

    document.querySelectorAll('.submenu').forEach(submenu => {
        submenu.addEventListener('mouseover', function () {
            this.style.display = 'block';
        });

        submenu.addEventListener('mouseout', function () {
            this.style.display = 'none';
        });
    });

    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você não poderá reverter esta ação!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, deletar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    const tipoImovelSelect = document.getElementById('tipo_imovel');
    const imovelContainer = document.getElementById('imovel-container');
    const imovelSelect = document.getElementById('imovel_id');

    if (tipoImovelSelect) { 
        tipoImovelSelect.addEventListener('change', function () {
            const tipo = this.value;

            if (tipo) {
                fetch(`/vendas/fetch-imoveis?tipo_imovel=${tipo}`)
                    .then(response => response.json())
                    .then(data => {
                        imovelSelect.innerHTML = '<option value="" disabled selected>Selecione o imóvel</option>';
                        data.forEach(imovel => {
                            let descricao = '';
                            if (tipo === 'casa') {
                                descricao = `Casa: ${imovel.rua}, ${imovel.numero}, Bairro: ${imovel.bairro}, Cidade: ${imovel.cidade}, Área: ${imovel.area_total} m²`;
                            } else if (tipo === 'apartamento') {
                                descricao = `Apartamento: Bloco ${imovel.bloco_predio}, Ap. ${imovel.numero_apartamento}, Andar ${imovel.andar}, Bairro: ${imovel.bairro}, Cidade: ${imovel.cidade}`;
                            } else if (tipo === 'lote') {
                                descricao = `Lote ${imovel.numero_lote}, Bairro: ${imovel.bairro}, Cidade: ${imovel.cidade}, Área: ${imovel.area_total} m²`;
                            }
                            imovelSelect.innerHTML += `<option value="${imovel.id}">${descricao}</option>`;
                        });
                        imovelContainer.style.display = 'block';
                    })
                    .catch(error => {
                        console.error('Erro ao buscar imóveis:', error);
                        alert('Erro ao buscar imóveis disponíveis.');
                    });
            } else {
                imovelContainer.style.display = 'none';
                imovelSelect.innerHTML = '';
            }
        });
    }
});
