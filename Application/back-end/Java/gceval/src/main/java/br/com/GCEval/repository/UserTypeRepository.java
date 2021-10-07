package br.com.GCEval.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Usertype;
import java.util.Optional;

public interface UserTypeRepository extends JpaRepository<Usertype, Integer> {
	public Optional<Usertype> findById(Integer id);
}
