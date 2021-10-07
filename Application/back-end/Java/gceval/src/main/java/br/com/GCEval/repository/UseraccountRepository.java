package br.com.GCEval.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Useraccount;
import java.util.List;
import java.util.Optional;
import org.springframework.data.repository.query.Param;

public interface UseraccountRepository extends JpaRepository<Useraccount, Integer> {
	public Optional<Useraccount> findById(Integer id);
        public Optional<Useraccount> findByEmail(@Param("email") String email);
        public List<Useraccount> findByNomeContainingIgnoreCase(@Param("nome") String nome);
}
