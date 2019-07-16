package br.com.GCEval.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Diagnostic;
import java.util.Optional;

public interface DiagnosticRepository extends JpaRepository<Diagnostic, Integer> {
	public Optional<Diagnostic> findById(Integer id);
}
