package br.com.GCEval.repository;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Grouping;

public interface GroupingRepository extends JpaRepository<Grouping, Integer> {
	public Optional<Grouping> findById(Integer id);
}
