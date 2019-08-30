package br.com.GCEval.repository;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Company;
import br.com.GCEval.model.Useraccount;
import java.util.List;
import org.springframework.data.repository.query.Param;

public interface CompanyRepository extends JpaRepository<Company, Integer> {
	public Optional<Company> findById(Integer id);
	public List<Company> findByOwner(@Param("owner") Useraccount uc );

}
