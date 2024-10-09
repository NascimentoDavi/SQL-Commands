# SQL Commands and Topics - Davi Rodrigues do Nascimento


## Cardinalidade
Refere-se ao Relacionamento Numérico entre as instâncias de duas entidades que são associadas entre si em um BANCO DE DADOS RELACIONAL. Define quantas instâncias de uma entidade se relacionam com uma determinada quantidade de instâncias de outra entidade.

### Tipos de Cardinalidade
- Um para Um (1:1)
- Um para Muitos (1:N)
- Muitos para Muitos (M:N)
- Zero ou Um para Muitos (0..1:N)

#### Um para Um (1:1)
Significa que uma instância de uma entidade se relaciona com no máximo uma instância da outra entidade, e vice versa.
__Exemplo:__
Relacionamento entre duas entidades, Empregado e Dependente. Enquanto um Emprego pode ter nenhum ou vários dependentes (0:N), um dependente está associado a um e somente um Empregado, o que caracteriza a cardinalidade (1:1).

#### Um para Muitos (1:N)
Significa que uma instância de uma entidade pode estar associada a uma ou várias instâncias de outra entidade, mas não vice-versa.
__Exemplo:__
Relacionamento entre a entidade Curso e Aulas. Um curso possui várias aulas, enquanto uma aula está associada somente a um curso. Enquanto o Curso de Ciência da Computação possui Várias aulas de diversas matérias, podem ter aulas que só pertencem ao curso de Ciência da Computação. **Atenção**: Grande parte dessas definições depende da regra de negócios aplicadada durante o desenvolvimento do projeto.

#### Muitos para Muitos (M:N)
Significa que muitas instâncias de uma entidade podem se relacionar com várias instâncias de outra entidade, e vice-versa. Geralmente para implementar esse tipo de cardinalidade usamos uma tabela associativa;
__Exemplo:__
Relacionamento entre instâncis da entidade Engenheiro e Projetos. Enquanto um Engenheiro pode estar alocado a vários Projetos diferentes, um Projeto pode ter vários Engemheiros diferentes atuando neles. Também em relacionamentos entre entidade Médico e entidade Paciente; Um paciente pode ser atendido por vários médicos enquanto um médico pode atender vários pacientes.

- Tabela Associativa : Também chamada Entidade Associativa, ela ocorre em relacionamentos (N:N). Num relacionamento entre entidades da classe Aluno e entidades da classe Curso, há no meio a entidade associativa Matrícula, que tem seus próprios atributos também, se comportando como uma entidade. O que muda é sua representação.

#### Zero ou Um para Muitos (0..1:N)
Significa que uma instância de uma entidade pode se relacionar com nenhuma ou no máximo uma entidade pode se relacionar com nenhuma ou no máximo uma única instância da outra entidade, mas cada instância dessa outra entidade pode se relacionar com muitas da primeira.
__Exemplo:__
Funcionários e Gerente de uma empresa: Um funcionário pode não ter um gerente ou pode ter exatamente um. Mas cada gerente tem muitos funcionários sob sua supervisão. Outros exemplos incluem Doadores e Doações. Um doador pode não ter feito nenhuma doação, assim como pode ter feito uma doação grande. Uma doação está associada a somente um doador.

