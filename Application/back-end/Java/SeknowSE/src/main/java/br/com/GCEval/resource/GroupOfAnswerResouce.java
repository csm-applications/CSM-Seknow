package br.com.GCEval.resource;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.model.Groupofanswer;
import br.com.GCEval.repository.GroupOfAnswerRepository;

@RestController
@RequestMapping("/groupofanswer")
public class GroupOfAnswerResouce {
	
	
	@Autowired
	private GroupOfAnswerRepository groupOfAnswerRepository;
	
	@GetMapping
	public List<Groupofanswer> findAll() {
		return groupOfAnswerRepository.findAll();
	}
	
	@GetMapping("/{id}")
	public Optional<Groupofanswer> findById(@PathVariable Integer id) {
		
		Optional<Groupofanswer> company = groupOfAnswerRepository.findById(id);
		return company;
		
	}
	


}
