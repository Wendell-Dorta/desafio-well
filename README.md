# Sistema de Reservas do Restaurante

## Faixa de Promoção

Em uma área destacada no topo do site de acesso público, deve haver uma faixa chamativa para a possibilidade de fazer reservas no restaurante. A promoção inclui:

- **Sobremesa grátis** para o titular da reserva.
- **10% de desconto** em todas as bebidas da comanda da mesa associada à reserva.

## Menu

- Um item de menu em vermelho chamado **"Faça sua Reserva"**.
  - Ao clicar, o usuário será direcionado a uma tela que explica as regras dos pedidos de reservas.

## Regras de Reserva

- **Antecedência:** No mínimo 24 horas e no máximo 45 dias.
- **Limite:** Apenas um pedido de reserva por dia para um mesmo CPF.
- **Informações Necessárias:** Nome completo, CPF e e-mail.
  - **CPF e e-mail** são utilizados para login no sistema de reserva, além da senha.

## Cancelamento e Gestão de Reservas

- **Cancelamento:** Reservas realizadas podem ser canceladas pelo cliente, mas não removidas do banco de dados para futuras promoções.
- **Administração:** O administrador do sistema deve listar reservas para confirmar ou negar, mas não pode excluir reservas.
  - Ao confirmar, o administrador inclui o número da mesa reservada, que **não deve ser visível para o cliente**.
  - O cliente receberá uma notificação por e-mail com o **código gerado pelo sistema (Número de reserva)**, tornando a reserva válida.
  - Em caso de negativa, o administrador registra o motivo e o cliente recebe essa informação por e-mail.
- **Remoção:** Administradores podem remover reservas.

## Área Administrativa

- **Filtros Disponíveis:**
  - Status
  - CPF
  - Data das reservas

- **Status Expirado:** No dia seguinte à data das reservas (atendidas ou não), o sistema deve alterar o status para **expirado** e não listar mais como reservas ativas.

## Considerações Adicionais

- Reservas serão consideradas apenas se alteradas para **confirmada**.
- O cliente deve indicar:
  - Data escolhida
  - Horário
  - Número de pessoas
  - Motivo da reserva (opcional):
    - Exemplo: "Aniversário", "Casamento", "Confraternização", etc. Não Obrigatorio
