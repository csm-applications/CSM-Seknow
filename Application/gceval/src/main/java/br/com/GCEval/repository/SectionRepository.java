package br.com.GCEval.repository;


import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Section;
import java.util.Optional;

public interface SectionRepository extends JpaRepository<Section, Integer> {
	public Optional<Section> findById(Integer id);
}
