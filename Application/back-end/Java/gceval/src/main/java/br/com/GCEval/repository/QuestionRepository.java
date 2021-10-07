package br.com.GCEval.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Question;
import java.util.Optional;

public interface QuestionRepository extends JpaRepository<Question, Integer> {
	public Optional<Question> findById(Integer id);
}
