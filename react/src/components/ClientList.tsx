import { useEffect, useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";

// Definição do tipo Cliente
interface Cliente {
  cd_cliente: number;
  nm_cliente: string;
  nr_telefone: string;
  dt_nasc: string;
  nr_rg: string;
  nr_cpf: string;
}

interface ApiResponse {
  data: Cliente[];
  message: string;
  success: boolean;
  errors: string;
}

export default function ClientList() {
  const [clients, setClients] = useState<Cliente[]>([]);
  const [modalOpen, setModalOpen] = useState(false);
  const [form, setForm] = useState<Partial<Cliente>>({
    nm_cliente: "",
    nr_telefone: "",
    dt_nasc: "",
    nr_rg: "",
    nr_cpf: ""
  });

  useEffect(() => {
    fetchClients();
  }, []);

  const fetchClients = async () => {
    try {
      const response = await fetch("http://localhost/api/cliente");
      const result: ApiResponse = await response.json();
      setClients(result.data);
    } catch (error) {
      console.error("Erro ao buscar clientes:", error);
    }
  };

  const handleSave = async () => {
    const method = form.cd_cliente ? "PUT" : "POST";
    const url = form.cd_cliente
      //? `http://localhost/api/cliente/${form.cd_cliente}`
      ? `http://localhost/api/cliente`
      : `http://localhost/api/cliente`;

      const response = await fetch(url, {
      method,
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(form),
    });

    const result: ApiResponse = await response.json();
    alert(result.data+result.errors);

    setModalOpen(false);
    fetchClients();
  };


  const handleDelete = async (id: number) => {
    const response = await fetch(`http://localhost/api/cliente/${id}`, { method: "DELETE" });
    const result: ApiResponse = await response.json();
    alert(result.message);
    fetchClients();
  };


  return (
    <div className="container mt-5">
      <h2 className="mb-4 text-center">Lista de Clientes</h2>

      <button
        className="btn btn-primary mb-3"
        onClick={() => {
          setForm({ nm_cliente: "", nr_telefone: "" });
          setModalOpen(true);
        }}
      >
        + Novo Cliente
      </button>

      <div className="table-responsive">
        <table className="table table-striped table-bordered text-center">
          <thead className="table-dark">
            <tr>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            {clients.map((client) => (
              <tr key={client.cd_cliente}>
                <td>{client.nm_cliente}</td>
                <td>{client.nr_telefone}</td>
                <td>
                  <button
                    className="btn btn-success btn-sm me-2"
                    onClick={() => {
                      setForm(client);
                      setModalOpen(true);
                    }}
                  >
                    ✏️ Editar
                  </button>
                  <button
                    className="btn btn-danger btn-sm"
                    onClick={() => handleDelete(client.cd_cliente)}
                  >
                    ❌ Excluir
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      {/* Modal de Cadastro/Edição */}
      {modalOpen && (
        <div className="modal show d-block" tabIndex={-1} role="dialog">
          <div className="modal-dialog modal-dialog-centered">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title">
                  {form.cd_cliente ? "Editar Cliente" : "Novo Cliente"}
                </h5>
                <button
                  type="button"
                  className="btn-close"
                  onClick={() => setModalOpen(false)}
                ></button>
              </div>
              <div className="modal-body">
                <div className="mb-3">
                  <label className="form-label">Nome</label>
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Nome do Cliente"
                    value={form.nm_cliente}
                    onChange={(e) =>
                      setForm({ ...form, nm_cliente: e.target.value })
                    }
                  />
                </div>
                <div className="mb-3">
                  <label className="form-label">CPF</label>
                  <input
                    type="text"
                    className="form-control"
                    placeholder="CPF"
                    value={form.nr_cpf}
                    onChange={(e) =>
                      setForm({ ...form, nr_cpf: e.target.value })
                    }
                  />
                </div>
                <div className="mb-3">
                  <label className="form-label">RG</label>
                  <input
                    type="text"
                    className="form-control"
                    placeholder="RG"
                    value={form.nr_rg}
                    onChange={(e) =>
                      setForm({ ...form, nr_rg: e.target.value })
                    }
                  />
                </div>
                <div className="mb-3">
                  <label className="form-label">Telefone</label>
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Telefone"
                    value={form.nr_telefone}
                    onChange={(e) =>
                      setForm({ ...form, nr_telefone: e.target.value })
                    }
                  />
                </div>
                <div className="mb-3">
                  <label className="form-label">Data Nasc.</label>
                  <input
                    type="date"
                    className="form-control"
                    placeholder="Date"
                    value={form.dt_nasc}
                    onChange={(e) =>
                      setForm({ ...form, dt_nasc: e.target.value })
                    }
                  />
                </div>
              </div>
              <div className="modal-footer">
                <button className="btn btn-primary" onClick={handleSave}>
                  💾 Salvar
                </button>
                <button
                  className="btn btn-secondary"
                  onClick={() => setModalOpen(false)}
                >
                  ❌ Cancelar
                </button>
              </div>
            </div>
          </div>
        </div>
      )}

      {/* Estilização para modal */}
      {modalOpen && <div className="modal-backdrop show"></div>}
    </div>
  );
}
