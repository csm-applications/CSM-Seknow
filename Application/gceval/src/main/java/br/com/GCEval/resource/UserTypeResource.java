package br.com.GCEval.resource;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.model.Section;
import br.com.GCEval.model.Usertype;
import br.com.GCEval.repository.UserTypeRepository;

@RestController
@RequestMapping("/usertypes")
public class UserTypeResource {
	
	
	@Autowired
	private UserTypeRepository userTypeRepository;
	
	@GetMapping
	public List<Usertype> findAll() {
		return userTypeRepository.findAll();
	}
	
	@GetMapping("/{id}")
	public Optional<Usertype> findById(@PathVariable Integer id) {
		
		Optional<Usertype> usertypes = userTypeRepository.findById(id);
		return usertypes;
		
	}
	


}
