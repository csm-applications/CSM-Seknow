package br.com.GCEval.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.GCEval.model.Answerdata;
import br.com.GCEval.model.Company;
import br.com.GCEval.model.Useraccount;
import java.util.List;
import java.util.Optional;
import org.springframework.data.repository.query.Param;

public interface AnswerDataRepository extends JpaRepository<Answerdata, Integer>  {
	public Optional<Answerdata> findById(Integer id);
        public List<Answerdata> findByUserAccount(@Param("UserAccount") Useraccount uc );
}
