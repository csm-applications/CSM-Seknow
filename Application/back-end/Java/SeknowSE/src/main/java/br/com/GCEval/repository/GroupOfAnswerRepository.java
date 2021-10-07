package br.com.GCEval.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Groupofanswer;
import java.util.Optional;

public interface GroupOfAnswerRepository extends JpaRepository<Groupofanswer, Integer> {
	public Optional<Groupofanswer> findById(Integer id);
}
