package br.com.GCEval.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Answer;
import java.util.Optional;

public interface AnswerRepository extends JpaRepository<Answer, Integer> {
	public Optional<Answer> findById(Integer id);
}
